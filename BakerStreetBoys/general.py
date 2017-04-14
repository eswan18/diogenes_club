import os

def get_secret_key():
    key_filename = "/home/eswan18/.dc.keys"
    keys = {}
    for line in open(key_filename):
        elements = line.split(":")
        if (len(elements) != 2):
            raise Exception("secret key file not formatted correctly")
        key = elements[0].strip()
        value = elements[1].strip()
        keys[key] = value
    return keys
