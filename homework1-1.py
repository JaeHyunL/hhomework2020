import sys
str1, str2 = list((map(str, input().split(','))))  # 단어의 구분을 , 로 함
a = []
b = []
str1 = list(set(str1))  # 중복제거
str2 = list(set(str2))  # 중복제거
if len(str1) != len(str2):
    print('input err')  # 입력값 단어 길이가 다를 때
    sys.exit()
for x in sorted(str1):  # 배열안에서 정렬
    a.append(x)
for y in sorted(str2):
    b.append(y)
if x == y:
    print('True')
else:
    print('False')
