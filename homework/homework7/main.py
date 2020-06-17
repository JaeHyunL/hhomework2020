from user_cache import UserCache
import requests
import json

from flask import request
from flask import Flask
from tabale import Examplelist
app = Flask(__name__)


@app.route('/user/<ID>', methods=['get'])
def getuser(ID):

    cache = UserCache()
    result = cache.get_user(ID)
    if result is not None:
        result = result.decode('utf-8', 'ignore')
    else:
        db = Examplelist()
        result = db.getUser(ID)
        cache.set_user(ID, str(result),3600)
    return json.dumps(result)


@app.route('/user', methods=['post'])
def add_user():

    j = request.get_json()
    db = Examplelist()
    result = db.addUser(j)
    result = {"message": "ok"} if result is None else result
    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


if __name__ == '__main__':
    app.run()
