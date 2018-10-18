# _*_ utf-8 _*_#
# str
import requests
a="l.e.o"
newlist = a.split(".")
print(newlist)
strlen=len(a)
print(strlen)
def p(arg):
    print(arg)
# list
items = ["l","e","o"]
items.pop(0)
items.insert(0,"one")
print(items[0])
for item in items:
    print(item)
def fastFor(items):
    for item in items:
        print(item)
fastFor(["1","2","3"])
# set去重
numlist = ["l","l","e","o"]
newnumlist = set(numlist)
print(newnumlist)
# 元组
myMuple = ("1","2","3")
p(myMuple[0])
res = requests.get("http://www.sina.com.cn/")
p(res.text.encode("utf-8"))



