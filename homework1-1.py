import sys
str1, str2 = list((map(str, input().split(','))))  # 단어의 구분을 , 로 함

if len(str1) != len(str2):
    print('Fasle')  # 입력값 단어 길이가 다를 때
    sys.exit()

a = sorted(str1)
b = sorted(str2)
if a == b:
    print('True')
else:
    print("False")
