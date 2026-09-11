import urllib.request
import json
import sys

def submit_task():
    try:
        req = urllib.request.Request(
            'http://127.0.0.1:8080/api/v1/submit',
            headers={'Content-Type': 'application/json'},
            data=json.dumps({"message": "Done"}).encode('utf-8')
        )
        response = urllib.request.urlopen(req)
        print("Success:", response.read().decode('utf-8'))
    except Exception as e:
        print("Failed to submit:", e)
        sys.exit(1)

if __name__ == '__main__':
    submit_task()
