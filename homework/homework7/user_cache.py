from redis_cache import BaseRedis

USERKEY = "user_{}"


class UserCache(BaseRedis):

    def get_user(self, ID):
        print('1', USERKEY)
        print('2', USERKEY.format(ID))

        try:
            data = self.redis_conn.get(USERKEY.format(ID))
            return data
        except Exception as e:
            print('에러 문제는 ', e)

    def set_user(self, ID, value, ttl):
        data = self.redis_conn.set(USERKEY.format(ID), value)
        return data

    def set_user_with_expire(self, ID, value, ttl=3600):
        data = self.redis_conn.set(USERKEY.format(ID), value, ex=ttl)
        return data

    def delete_user(self, ID, value):
        data = self.redis_conn.delete(USERKEY.format(ID))
        return data
