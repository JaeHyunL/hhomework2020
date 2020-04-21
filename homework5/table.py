from database import Database
import json
import utils

# 화이트 리스트 클래스 선언 데이터베이스 클래스를 상속받음


class Whitelist(Database):
    # get 함수 선언  url riskragne no 조회
    def getwhitelist(self, url):
        # 쿼리문 선언
        sql = "SELECT no,url,reliability "
        sql += "FROM whitelist "
        sql += "WHERE url='{}';".format(url)
        result = {}
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return("error : {}".format(e))
        result = {} if len(result) == 0 else result[0]

        return result


# 데이터베이스를 페이징해서 보여줄 수 있는 함수를 선언

    def list(self, page=0, itemsInPage=20):
        page = page * itemsInPage
        # page = page * 한페이지에 아이템 수를 곱하면 테이블에서 데이터를 꺼내올 수 있음.
        sql = "SELECT no,url,reliability "
        sql += "FROM whitelist "
        sql += "LIMIT {page} ,{itemsInPage}".format(
            page=page, itemsInPage=itemsInPage)
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            print('디버깅 포인트3  ==>{}'.format(sql))
        finally:
            return result


# 데이터 베이스에 저장하는 함수를 선언

    def insert(self, j):
        # utils에 addslashes 를 통해 중복문자 제거
        sql = "INSERT INTO whitelist(url,reliability)"
        sql += "values('{url}' , '{reliability}')".format(
            url=utils.addslashes(json.dumps(j.get("url", ""))),
            reliability=utils.addslashes(json.dumps(j.get("reliability", "")))
        )
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
            print('디버깅 포인트 2 :  오류출력  ', e)
        return result


# 인자값으로 받은 no 을 인자값으로 받은 j 라는 형태로 변경시킴

    def updatewhitelist(self, no, j):
        url = j.get("url", "")
        reliability = j.get("reliability", "")
        sql = "UPDATE whitelist SET"

        if len(url) > 0:
            sql += " url = '{}',".format(url)
        if reliability > 0:
            sql += " reliability='{}'".format(reliability)
        sql += " WHERE no={}".format(no)

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
        return result


# 인자값으로 받은 no 를 삭제

    def deletewhitelist(self, no):
        sql = "DELETE FROM whitelist "
        sql += "WHERE no = '{}'".format(no)

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result


# 블랙리스크 클래스 선언 데이터베이스 로 부터 상속받음
class Blacklist(Database):
    # get 함수 선언  url riskragne no 조회
    def get(self, url):
        sql = "SELECT no,url,riskrange "
        sql += "FROM blacklist "
        sql += "WHERE url='{}';".format(url)

        result = {}
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return("error : {}".format(e))
        result = {} if len(result) == 0 else result[0]

        return result

# 데이터베이스를 페이징해서 보여줄 수 있는 함수를 선언
    def list(self, page=0, itemsInPage=20):
        page = page * itemsInPage
        # page = page * 한페이지에 아이템 수를 곱하면 테이블에서 데이터를 꺼내올 수 있음
        sql = "SELECT no,url,riskrange "
        sql += "FROM blacklist "
        sql += "LIMIT {page} ,{itemsInPage}".format(
            page=page, itemsInPage=itemsInPage)
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            print('디버깅 포인트3  ==>{}'.format(sql))
        finally:
            return result


# 데이터 베이스에 저장하는 함수를 선언

    def insert(self, j):
        # utils에 addslashes 를 통해 중복문자 제거
        sql = "INSERT INTO blacklist(url,riskrange)"
        sql += "values('{url}' , '{riskrange}')".format(
            url=utils.addslashes(json.dumps(j.get("url", ""))),
            riskrange=utils.addslashes(json.dumps(j.get("riskrange", "")))
        )
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
            print('디버깅 포인트 2 :  오류출력  ', e)
        return result


# 인자값으로 받은 no 을 인자값으로 받은 j 라는 형태로 변경시킴

    def update(self, no, j):
        url = j.get("url", "")
        riskrange = j.get("riskrange", "")
        sql = "UPDATE blacklist SET "

        if len(url) > 0:
            sql += " url = '{}',".format(url)

        sql += " riskrange = {}".format(riskrange)

        sql += " WHERE no = {}".format(no)

#        print("디버깅 포인트 7 == >{}".format(sql))
        result = None
        try:
            #           print('디버깅포인트 13==---')
            self.cursor.execute(sql)

            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
        return result

# 인자값으로 받은 no 를 삭제

    def delete_blacklist(self, no):
        sql = "DELETE FROM blacklist "
        sql += "WHERE no = {}".format(no)

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result
