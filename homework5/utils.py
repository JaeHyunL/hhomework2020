def addslashes(s):
    l = ["\\", "'", '"', "\0", ]
    for i in l:
        if i in s:
            # 리스트 l 에있는 문자와 겹치면 치환해줌
            s = s.replace(i, '\\'+i)
    return s
