import requests
import sys
import urllib3

urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

proxies = {'http': 'http://127.0.0.1:8080', 'https': 'http://127.0.0.1:8080'}


def fileupload(url, file):
    files = {'image': open(file, 'rb')}
    cookies = {"PHPSESSID": "ll1h7leb5lsdj28t6ndd60ueqg"}

    r = requests.post(url, files=files, proxies=proxies,
                      verify=False, allow_redirects=False, cookies=cookies)

    if r.status_code in [301, 302]:
        if r.headers["Location"] == "/uploads":
            sys.stdout.write("\n")
            sys.stdout.write("\t[+] File Uploaded successfully")
            sys.exit()
    sys.stdout.flush()
    sys.stdout.write('\n')
    sys.stdout.write('\t File upload failed')
    sys.stdout.write('\n')


if __name__ == "__main__":
    try:
        url = sys.argv[1].strip()
        file = sys.argv[2].strip()
    except IndexError:
        print("[-] Usage: %s <URL> <FILE>" % sys.argv[0])
        print("[-] Example: %s www.example.com FilePath" % sys.argv[0])
        sys.exit(-1)
    fileupload(url, file)
