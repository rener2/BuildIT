import os.path

if os.path.exists("tag.txt"):
    with open('tag.txt', 'r') as f:
        read_data = f.read()
        if read_data != "":
            print("1")
        else:
            print("0")
else:
    print("0")
