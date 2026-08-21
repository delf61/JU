with open("fandhlp.txt", "r", encoding="utf-8", errors="replace") as f:
    content = f.read()

sections = content.split("===")
titles = []
for s in sections:
    lines = s.strip().split("\n")
    if lines:
        titles.append(lines[0].strip())

with open("titles.txt", "w") as out:
    for t in titles:
        out.write(t + "\n")
