import json
import logging
import requests
import time
import urllib

from flask import redirect
from flask import render_template
from flask import request
from flask import url_for
from flask import Flask
from usertable import UserTable

app = Flask(__name__)

# INSERT 함수 예제
@app.route('/user', methods=['POST'])
def add_user():
    j = request.get_json()
    print("디버깅 > 인풋 ===>{}".format(j))
    db = UserTable()
    result = db.insert(j)
    result = {"mesaage": "ok"} if result is None else result
    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )
    return response

# LIST 함수 출력
@app.route('/users', methods=['GET'])
def list_users():
    page = int(request.args.get('page', 0))
    np = int(request.args.get('itemsInPage', 20))
    db = UserTable()
    res = db.list(page=page, itemsInPage=np)
    result = {
        "users": "{}".format(res),
        "count": len(res),
        "page": page
    }
    return result


# Manage GET a user from users by id 함수 예제
@app.route('/user/<id>', methods=['GET', 'PUT', 'DELETE'])
def manage_user(id):
    if request.method == 'GET':
        result = get_user(id)
    elif request.method == 'PUT':
        result = update_user(id)
    elif request.method == 'DELETE':
        result = delete_user(id)
    else:
        result = {
            "error": "http method not found = {}".format(request.method)
        }

    return result

# GET a user from users by id


def get_user(id):

    db = UserTable()
    result = db.get(id)

    return json.dumps(result)


def update_user(id):

    j = request.get_json()
    db = UserTable()
    result = db.update(id, j)
    result = {"massage": "ok"} if result is None else result
    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )


def delete_user(id):

    db = UserTable()
    result = db.delete_user(id, j)
    result = {"massage": "ok"} if result is None else result
    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'

    )

    return response


if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True, port=80)