import http.server
import http.client
import ids
import parser
import sys

TARGET_SERVER = 'app'
TARGET_PORT = 8000
MODEL = ids.IA()


class ProxyHandler(http.server.BaseHTTPRequestHandler):
    def do_GET(self):
        self.scan_request('GET')

    def do_POST(self):
        if 'Content-Length' in self.headers:
            body = self.rfile.read(int(self.headers['Content-Length'])).decode()
        else:
            body = ''

        self.scan_request('POST', body)

    def do_PUT(self):
        self.scan_request('PUT')

    def do_DELETE(self):
        self.scan_request('DELETE')

    def do_HEAD(self):
        self.scan_request('HEAD')

    def scan_request(self, method, body=''):

        if self.path == "/process_login.php":
                data = parser.parse(body, ["username", "password"])
                
        for d in data:
            p = MODEL.predict(d)
            if p > 0.4:
                print("Injection detected !!!", file=sys.stderr)
                self.handle_error()

        print("No injection detected", file=sys.stderr)
        self.handle_request(method, body)
            

    def handle_request(self, method, body=''):
        # Open a connection to the target server
        conn = http.client.HTTPConnection(TARGET_SERVER, TARGET_PORT)
        
        conn.request(method, self.path, headers=self.headers, body=body)

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

    def handle_error(self):
        # Open a connection to the target server
        conn = http.client.HTTPConnection(TARGET_SERVER, TARGET_PORT)
        
        conn.request("GET", "/error.html", headers=self.headers)

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
    # Setup the model
    # Start the reverse proxy server on port 8000
    server_address = ('', 8000)
    httpd = http.server.HTTPServer(server_address, ProxyHandler)
    print('Reverse proxy server running on port 8000...')
    httpd.serve_forever()
