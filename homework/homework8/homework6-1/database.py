
import pymysql
import os


class Database():

    # 생성자.
    def __init__(self):
        self.db = pymysql.connect(
            host=os.getenv('FLASK_DB'),
            user='root',
            password='password',
            db='homework4',
            charset='utf8'
        )
        # Connect 로부터 Dictoionary Cursor 생성
        self.cursor = self.db.cursor(pymysql.cursors.DictCursor)

    # 파괴자
    def __del__(self):
        # db 생성자 종료
        self.db.close()
        # cursor 종료
        self.cursor.close()

    # excute 함수 선언
    def execute(self, query, args={}):
        # 쿼리문을 선언할 수 있게 해줌
        self.cursor.execute(query, args)

    # excuteOne 함수 선언
    def executeOne(self, query, args={}):

        # 한가지의 로우를 선택할 수 있는 쿼리
        self.cursor.execute(query, args)
        row = self.cursor.fetchone()
        return row

    # excuteAll 함수 선언
    def executeAll(self, query, args={}):
        #  다수의 로우를 선택할 수 있는 쿼리
        self.cursor.execute(query, args)
        row = self.cursor.fetchall()
        return row

    # commit 함수 선언
    def commit(self):
        # 디비에 저장할때 트랜잭션을 업뎃
        self.db.commit()
