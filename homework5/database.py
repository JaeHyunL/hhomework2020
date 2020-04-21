
import pymysql
import os


class Database():

    # 생성자
    def __init__(self):
        self.db = pymysql.connect(
            host=os.getenv('FLASK_DB'),
            user='root',
            password='password',
            db='homework4',
            charset='utf8'
        )
        self.cursor = self.db.cursor(pymysql.cursors.DictCursor)
    # 파괴자

    def __del__(self):
        self.db.close()
        self.cursor.close()
    # 일반적인 쿼리

    def execute(self, query, args={}):
        self.cursor.execute(query, args)
    # 셀렉트 쿼리 한개의 로우

    def executeOne(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchone()
        return row
    # 다수의 로우를 가져올때  SEleCET

    def executeAll(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchall()
        return row
    # 디비에 저장할때 트랜잭션을 업뎃

    def commit(self):
        self.db.commit()
