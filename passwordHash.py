from hashlib import sha256
string = "python"
h = sha256()
h.update(string)
hash = h.hexdigest()
print(hash)