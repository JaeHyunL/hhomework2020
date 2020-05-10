from databases import Database
import json
import utils


class Examplelist(Database):

    def getUser(self, ID):
        sql = "SELECT No,ID "
        sql += "FROM user "
        sql += "WHERE ID='{}';".format(ID)
        result = {}
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            print("Log Point1 {}".format(e))
            return ("error1 : {}".format(e))
        result = {} if len(result) == 0 else result[0]

        return result

    def addUser(self, j):

        sql = "INSERT INTO user(ID)"
        sql += "values('{url}')".format(
            url=utils.addslashes(json.dumps(j.get("ID", "")))
        )
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error2:" "{}".format(e)}
            print("Log Point 2  : ", e)
        return result
