from database import Database
import json
import utils


class Whitelist(Database):

    def getwhitelist(self, url):

        sql = "SELECT no,url,reliability "
        sql += "FROM whitelist "
        sql += "WHERE url='{}';".format(url)
        print('디버깅 포인트 6 sql= ', sql)
        result = {}
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return("error : {}".format(e))
        result = {} if len(result) == 0 else result[0]

        return result

    def list(self, page=0, itemsInPage=20):
        page = page * itemsInPage
        # page = page * 한페이지에 아이템 수를 곱하면 테이블에서 데이터를 꺼내올 수 있음
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

    def insert(self, j):
        # utils 를 만들어서 addslashes 를 하는 이유는 디비 겹 다운포함될 가능성이 있어서 문자열로 집어넣어줌

        sql = "INSERT INTO whitelist(url,reliability)"
        sql += "values('{url}' , '{reliability}')".format(
            url=utils.addslashes(json.dumps(j.get("url", ""))),
            reliability=utils.addslashes(json.dumps(j.get("reliability", "")))
        )
        print("디버그 에스큐엘 = > {}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
            print('디버깅 포인트 2 :  정상출력범위 ')
        except Exception as e:
            result = {"error": "{}".format(e)}
            print('디버깅 포인트 2 :  오류출력  ', e)
        return result

    def updatewhitelist(self, no, j):
        url = j.get("url", "")
        reliability = j.get("reliability", "")
        sql = "UPDATE whitelist SET"

        if len(url) > 0:
            sql += " url = '{}',".format(url)
        if reliability > 0:
            sql += " reliability='{}'".format(reliability)

        sql += " WHERE no={}".format(no)

        print("디버깅 포인트 7 == >{}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
        return result

    def deletewhitelist(self, no):
        sql = "DELETE FROM whitelist "
        sql += "WHERE no = '{}'".format(no)

        print("디버그 SQL ===> {}".format(sql))

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result


class Blacklist(Database):
    def get(self, url):
        sql = "SELECT no,url,riskrange "
        sql += "FROM blacklist "
        sql += "WHERE url='{}';".format(url)

        print("디버깅 포인트 11  ===>{}".format(sql))
        result = {}
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return("error : {}".format(e))
        result = {} if len(result) == 0 else result[0]

        return result

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

    def insert(self, j):
        # utils 를 만들어서 addslashes 를 하는 이유는 디비 겹 다운포함될 가능성이 있어서 문자열로 집어넣어줌

        sql = "INSERT INTO blacklist(url,riskrange)"
        sql += "values('{url}' , '{riskrange}')".format(
            url=utils.addslashes(json.dumps(j.get("url", ""))),
            riskrange=utils.addslashes(json.dumps(j.get("riskrange", "")))
        )
        print("디버그 에스큐엘 = > {}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
            print('디버깅 포인트 2 :  정상출력범위 ')
        except Exception as e:
            result = {"error": "{}".format(e)}
            print('디버깅 포인트 2 :  오류출력  ', e)
        return result

    def update(self, no, j):
        url = j.get("url", "")
        riskrange = j.get("riskrange", "")
        sql = "UPDATE blacklist SET "

        if len(url) > 0:
            sql += " url = '{}',".format(url)

        sql += " riskrange = {},".format(riskrange)

        sql += " WHERE no = {}".format(no)

        print("디버깅 포인트 7 == >{}".format(sql))
        result = None
        try:
            print('디버깅포인트 13==---')
            self.cursor.execute(sql)

            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}
        return result

    def delete_user(self, no):
        sql = "DELETE FROM blacklist "
        sql += "WHERE no = '{}'".format(no)

        print("디버그 SQL ===> {}".format(sql))

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result
