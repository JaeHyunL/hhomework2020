"""
Q1. python으로 random 숫자를 n개 생성하는 함수를 만드세요. (20점)
    함수: gen_random(n), sorted_random(n)
    gen_random(n) : 정렬되지 않는 n개의 난수 숫자 리스트를.
    sorted_random(n) : 정렬된 n개의 난수 리스트.
    1) INPUT n = n개의 숫자를 의미
         r = random 정수 숫자, 0 < r <= n
    2) OUTPUT : list([]) 에 작은 숫자부터 정렬되어 결과가 나오도록 출력
    3) 함수를 실행하는 메인함수 작성필요.
    4) 정렬 알고리즘의 시간복잡도 설명하시오. (README.md 파일에 추가할 것)
       (시간복잡도가 좋은 것에 따라 평가점수 달라짐)
"""

import random
# 정렬 되지 않은 랜덤한 난수


def gen(n):
    gen_random = random.sample(range(1, 100000), n)
    return gen_random


def sorted_random(a):
    num = len(a)
    if num <= 1:
        return a
    mid = num // 2
    g1 = sorted_random(a[:mid])
    g2 = sorted_random(a[mid:])
    result = []
    while g1 and g2:
        if g1[0] < g2[0]:
            result.append(g1.pop(0))
        else:
            result.append(g2.pop(0))
    while g1:
        result.append(g1.pop(0))
    while g2:
        result.append(g2.pop(0))
    return result


if __name__ == "__main__":
    n = int(input())
    gen_random = gen(n)
    print(gen_random)
    print(sorted_random(gen_random))
