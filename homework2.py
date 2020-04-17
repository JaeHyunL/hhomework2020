import homework1 as hw1
from database import Database
from flask import Flask, request
application = Flask(__name__)


# private SELECT querry
def _selcet():
    db = Database()  # 데이터베이스 인스터스 생성
    sql = "SELECT id, test \
            FROM database2.testTable"  # 쿼리문 작성
    row = db.executeAll(sql)  # 쿼리문에 있는 내용 실행

    return row
# INSERT 함수 예제
@application.route('/insert', methods=['GET'])
def insert():
    db = Database()  # 디비 생성
    sql = "INSERT INTO database2.testTable(test) \
            VALUES('%s')" % ('testData')  # 쿼리문으로 테스트 테이블에다가 테스트 데이터를 입력
    db.execute(sql)  # 디비에서 excute 실행함
    db.commit()  # 트랜잭션 변경사항 저장
    return "inserted=>{}".format(_selcet())
# 셀렉
@application.route('/select', methods=['GET'])
def select():
    return "selected=>{}".format(_selcet())
# 업데이트
@application.route('/update', methods=['GET'])
def update():
    db = Database()
    sql = "UPDATE database2.testTable \
            SET test ='%s' \
            WHERE test='testData'" % ('update_Data')
    db.execute(sql)
    db.commit()
    return "update => {}".format(_selcet())

# 딜릿
@application.route('/delete', methods=['GET'])
def delete():
    db = Database()
    sql = "DELETE FROM database2.testTable \
            WHERE test= 'testData'"
    db.execute(sql)
    db.commit()
    return "delete => {}".format(_selcet())


@application.route("/", methods=['GET'])
def hello():
    str1 = request.args.get("str1")
    str2 = request.args.get("str2")

    return str(hw1.hw(str1, str2))


if __name__ == "__main__":
    application.run(host='0.0.0.0')
