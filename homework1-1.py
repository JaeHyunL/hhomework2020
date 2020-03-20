import sys
str1, str2 = list((map(str, input().split(','))))  # 단어의 구분을 , 로 함
a = sorted(str1)
b = sorted(str2)
if a == b:
    print(True)
else:
    print(False)
