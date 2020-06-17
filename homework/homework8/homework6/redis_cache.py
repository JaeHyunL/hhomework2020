import os
import redis


class BaseRedis():

    def __init__(self):
        try:
            self.redis_conn = redis.StrictRedis(
                host=os.getenv('REDIS_HOST'),
                port=os.getenv('REDIS_PORT'),
                db=0
            )
        except Exception as e:
            print("Redis connection error: ", e)
            error_massage = "레디스 연결 에러 입니당 :{}".format(e)
            return error_massage
