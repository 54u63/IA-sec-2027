def parse(data, field):
    ret = []
    data = data.split('&')

    for d in data:
        new = d.split("=")

        if new[0] in field:
            ret.append(new[1])

    print(ret)
    return ret
