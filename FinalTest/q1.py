
import random

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
