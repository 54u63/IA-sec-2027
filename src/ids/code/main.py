import http.server
import http.client

TARGET_SERVER = 'web'
TARGET_PORT = 8080

class ProxyHandler(http.server.BaseHTTPRequestHandler):
    def do_GET(self):
        self.handle_request('GET')

    def do_POST(self):
        self.handle_request('POST')

    def do_PUT(self):
        self.handle_request('PUT')

    def do_DELETE(self):
        self.handle_request('DELETE')

    def do_HEAD(self):
        self.handle_request('HEAD')

    def handle_request(self, method):
        print("Handling request")
        # Open a connection to the target server
        conn = http.client.HTTPConnection(TARGET_SERVER, TARGET_PORT)
        
        # Send the original request to the target server with all headers
        conn.request(method, self.path, headers=self.headers)

        # Get the response from the target server
        response = conn.getresponse()

        # Send the target server's response back to the client
        self.send_response(response.status)

        for header, value in response.getheaders():
            if header != 'Date' and header != 'Server':
                self.send_header(header, value)

        self.end_headers()

        self.wfile.write(response.read())
        conn.close()

if __name__ == '__main__':
    # Start the reverse proxy server on port 8000
    server_address = ('', 8000)
    httpd = http.server.HTTPServer(server_address, ProxyHandler)
    print('Reverse proxy server running on port 8000...')
    httpd.serve_forever()
