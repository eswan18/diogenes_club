import os

def get_cred():
    cred_filename = "/home/ec2-user/.mysql.credentials"
    for line in open(cred_filename):
        print line
    return "hi"
