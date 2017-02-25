import os

def get_cred():
    cred_filename = "/home/ec2-user/.mysql.credentials"
    creds = {}
    for line in open(cred_filename):
        elements = line.split(":")
        if (len(elements) != 2):
            raise Exception("mysql credentials file not formatted correctly")
        key = elements[0].strip()
        value = elements[1].strip()
        creds[key] = value
    print(creds)
    return creds
