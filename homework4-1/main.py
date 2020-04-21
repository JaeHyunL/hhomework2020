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
from table import Whitelist
from table import Blacklist


app = Flask(__name__)


@app.route('/whitelist', methods=['POST'])
def add_user():

    j = request.get_json()

    print("DEBUG> input ===>{}".format(j))

    db = Whitelist()
    result = db.insert(j)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


# LIST 예제
@app.route('/whitelists', methods=['GET'])
def list_users():

    page = int(request.args.get('page', "0"))
    np = int(request.args.get('itemsInPage', "20"))

    db = Whitelist()
    res = db.list(page=page, itemsInPage=np)

    result = {
        "users": "{}".format(res),
        "count": len(res),
        "page": page
    }

    return result


# Manage a user from users by ID 예제
@app.route('/whitelist/<url>', methods=['GET', 'PUT', 'DELETE'])
def manage_user(url):
    if request.method == 'GET':
        result = get_whitelist(url)

    elif request.method == 'PUT':
        result = update_whitelist(url)

    elif request.method == 'DELETE':
        result = delete_whitelist(url)
    else:
        result = {
            "error": "http method not found = {}".format(request.method)
        }

    return result


# Get a user from users by ID 예제
def get_whitelist(url):

    db = Whitelist()
    result = db.getwhitelist(url)
    print(result)
    return json.dumps(result)


def update_whitelist(no):

    j = request.get_json()
    db = Whitelist()
    result = db.updatewhitelist(no, j)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


def delete_whitelist(no):

    db = Whitelist()
    result = db.deletewhitelist(no)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


################################################
@app.route('/blacklist', methods=['POST'])
def add_blackslist():

    j = request.get_json()

    print("DEBUG> input ===>{}".format(j))

    db = Blacklist()
    result = db.insert(j)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


# LIST 예제
@app.route('/blacklists', methods=['GET'])
def list_blacklist():

    page = int(request.args.get('page', "0"))
    np = int(request.args.get('itemsInPage', "20"))

    db = Blacklist()
    res = db.list(page=page, itemsInPage=np)

    result = {
        "users": "{}".format(res),
        "count": len(res),
        "page": page
    }

    return result


# Manage a user from users by ID 예제
@app.route('/blacklist/<no>', methods=['GET', 'PUT', 'DELETE'])
def manage_blacklist(no):
    if request.method == 'GET':
        result = get_blacklist(no)
    elif request.method == 'PUT':
        result = update_blacklist(no)
    elif request.method == 'DELETE':
        result = delete_blacklist(no)
    else:

        result = {
            "error": "http method not found = {}".format(request.method)
        }

    return result


# Get a user from users by ID 예제
def get_blacklist(no):

    db = Blacklist()
    result = db.get(no)

    return json.dumps(result)


def update_blacklist(no):

    j = request.get_json()
    db = Blacklist()
    result = db.update(no, j)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


def delete_blacklist(no):

    db = Blacklist()
    result = db.delete_user(no)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True, port=80)
