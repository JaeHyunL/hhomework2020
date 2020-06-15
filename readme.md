1학기 기말고사
==============

Q1. python으로 random 숫자를 n개 생성하는 함수를 만드세요. (20점)
--------------------------------------------------------------

해당 부분의 알고리즘은 병합정렬을 사용 했으며 병합정렬을 사용한 이유는  내림차순 정렬에는
여러가지 알고리즘이 많은데 그 중에서 병합정렬이 최선,최악,평균 시간복잡도가 O(n log n) 으로 가장
적당하고 생각하고 시간복잡도 만 생각하는 문제에선 병합정렬이 가장 적합하다고 생각하여서 작성했습니다.


병합정렬에 간단히 설명하자면
![aa](https://user-images.githubusercontent.com/48937399/84622030-0f0f7000-af17-11ea-9e93-6e6b21eaed38.png)

해당 이미지 파일처럼 반으로 나눈후 다시 합치는과정에서 정렬을 한 후 다시 합쳐줍니다.

시간복잡도 계산과정 )

두 부분을 쪼개는데 O(log N)만큼에 시간복잡도가 사용되고 , 데이터 병합에 O(N) 만큼 시간 복잡도를 사용하기에 
정렬 상태와 무관하게 언제나 O(n log n)입니다.