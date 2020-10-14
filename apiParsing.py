import requests

download_url = "https://pokeapi.co/api/v2/pokemon/1"
target_json_path = "pokiAi.json"

response = requests.get(download_url)
response.raise_for_status()    # Check that the request was successful
with open(target_json_path, "wb") as f:
    f.write(response.content)
print("Download ready.")