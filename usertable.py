from database import Database
import json
import utils


class UserTable(Database):

    def get(self, id):
        sql = "SELECT id ,useremail,username,userphone, userdesc, views"
        sql += "FROM user"
        sql += "WHERE id={};".format(id)
        print("디버그 SQL ===>{}".format(sql))
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
        sql = "SELECT id ,useremail,username,userphone, userdesc, views"
        sql += "FROM user"
        sql += "LIMIT {page} ,{itemsInPage}".format(
            page=page, itemsInPage=itemsInPage)

        print('디버그 == > {}'.format(sql))

        self.cursor.execute(sql)
        result = self.cursor.fetchall()

        return result

    def insert(self, j):
        # utils 를 만들어서 addslashes 를 하는 이유는 디비 겹 다운포함될 가능성이 있어서 문자열로 집어넣어줌

        sql = "INSERT INTO user(useremail,username,userphone,userdesc)"
        sql += "values('{useremail}' , '{username}','{userphone}','{userdesc}')".format(
            useremail=utils.addslashes(json.dumps(j.get("useremail", ""))),
            username=utils.addslashes(json.dumps(j.get("username", ""))),
            userphone=utils.addslashes(json.dumps(j.get("userphone", ""))),
            userdesc=utils.addslashes(json.dumps(j.get("userdesc", "")))
        )
        print("디버그 에스큐엘 = > {}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result

    def update(self, id, j):
        useremail = j.get("useremail", "")
        username = j.get("username", "")
        userphone = j.get("userphone", "")
        userdesc = j.get("userdesc", "")

        sql = "UPDATE user SET "
        if len(useremail) > 0:
            sql += " useremail = '{}'".format(useremail)
        if len(username) > 0:
            sql += " username = '{}'".format(username)
        if len(userphone) > 0:
            sql += " userphone = '{}'".format(userphone)
        if len(userdesc) > 0:
            sql += " userdesc = '{}'".format(userdesc)

        sql += "views = views"
        sql += "WHERE id = {}".format(id)

        print("디버그 SQL == >{}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

    def delete_user(self, id):
        sql = "DELETE FROM user"
        sql += "WHERE id = '{}'".format(id)

        print("디버그 SQL ===> {}".format(sql))

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error": "{}".format(e)}

        return result
