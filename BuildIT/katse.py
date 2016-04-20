import Simple_reader as rdr
import time


def authentication():
  
	choice=0

	while True:
		choice=rdr.tagRead()
		f=open("tag.txt", "w")
		f.write(choice)
		f.close()
                time.sleep(10)
		f=open("tag.txt", "w")
		f.close()                
		authentication()

if __name__ == "__main__":

	authentication()
