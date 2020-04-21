import json
import logging
import requests
import time
import urllib

from flask import redirect
from flask import render_template
from flask import request
from flask import url_for
from flask import Flask, Blueprint
from table import Whitelist
from table import Blacklist

from flask_restplus import Api, Resource, fields
app = Flask(__name__)


blueprint = Blueprint('api', __name__, url_prefix='')
api = Api(blueprint,
          version='1.0',
          title=' GO LEE PROJECT',
          description='리스트  등록,수정,삭제,조회 API입니다',
          doc='/api/doc/'
          )
app.register_blueprint(blueprint)


ns = api.namespace('',
                   description='Whitelist 사용자 등록,수정,삭제,조회'
                   )  # /user 네임스페이스를 만든다


resource_whitelist = api.model('whitelist', {
    'url': fields.String(description='URL  ', required=True),
    'reliability': fields.Integer(description='신뢰도 ')
})


resource_whitelists = api.model('whitelists', {
    'whitelist': fields.List(fields.Nested(resource_whitelist), description='화이트리스트'),
    'count': fields.Integer(min=0),
    'page': fields.Integer(min=0)
})


luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int,
                      help='Number of Items in a page', location='query')


@ns.route('/whitelists')
class Whitelists(Resource):

    @api.expect(luParser)
    @api.marshal_with(resource_whitelists, as_list=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' 화이트리스트 정보 출력 (페이지) '''
        return list_whitelists()


@ns.route('/whitelist')
class addWhitelist(Resource):
    @api.expect(resource_whitelist, validate=False)
    @api.marshal_with(resource_whitelist, as_list=False)
    @api.response(200, 'Success')
    def post(self):
        ''' 화이트 리스트  등록. '''
        return add_whitelist()


@ns.route('/whitelist/<url>')
@api.doc(params={'url or no': 'url  입력 '})
class whitelist(Resource):

    @api.marshal_with(resource_whitelist)
    @api.response(200, 'Success')
    def get(self, url):
        ''' 화이트 리스트 조회. '''
        print(get_whitelist(url))
        return get_whitelist(url)

    @api.response(200, 'Success')
    @api.expect(resource_whitelist, validate=False)
    def put(self, url):
        ''' 화이트 리스트 변경. '''
        return update_whitelist(url)

    @api.response(200, 'Success')
    def delete(self, url):
        '''화이트 리스트 삭제 . '''
        return delete_whitelist(url)


ns = api.namespace('',
                   description='Blacklist 사용자 등록,수정,삭제,조회'
                   )  # /user 네임스페이스를 만든다


resource_blacklist = api.model('blacklist', {
    'url': fields.String(description='URL  ', required=True),
    'riskrange': fields.Integer(description='위험도')
})


resource_blacklists = api.model('resource_blacklists', {
    'resource_blacklist': fields.List(fields.Nested(resource_blacklist), description='블랙리스트'),
    'count': fields.Integer(min=0),
    'page': fields.Integer(min=0)
})

luParser = api.parser()
luParser.add_argument('page', type=int,
                      help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int,
                      help='Number of Items in a page')


@ns.route('/blacklists')
class Blacklists(Resource):

    @api.expect(luParser)
    @api.marshal_with(resource_blacklists, as_list=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' 블랙리스트 정보 출력 (페이지) '''
        return list_blacklist()


@ns.route('/blacklist')
class addBlacklist(Resource):
    @api.expect(resource_blacklist, validate=False)
    @api.marshal_with(resource_blacklist, as_list=False)
    @api.response(200, 'Success')
    def post(self):
        ''' 블랙 리스트  등록. '''
        return add_blackslist()


@ns.route('/blacklist/<url>')
@api.doc(params={'url or no': 'url  입력 '})
class blacklist(Resource):

    @api.marshal_with(resource_blacklist)
    @api.response(200, 'Success')
    def get(self, url):
        ''' 블랙 리스트 조회. '''
        print(get_blacklist(url))
        return get_blacklist(url)

    @api.response(200, 'Success')
    @api.expect(resource_blacklist, validate=False)
    def put(self, url):
        ''' 블랙 리스트 변경. '''
        return update_blacklist(url)

    @api.response(200, 'Success')
    def delete(self, url):
        '''블랙 리스트 삭제 . '''
        return deleteblacklist(url)


# @app.route('/whitelist', methods=['POST'])
def add_whitelist():

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
# @app.route('/whitelists', methods=['GET'])
def list_whitelists():

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
# @app.route('/whitelist/<url>', methods=['GET', 'PUT', 'DELETE'])
def manage_whitelist(url):
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

    print('디버깅 포인트 14', result)

    return result


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
        result = deleteblacklist(no)
    else:

        result = {
            "error": "http method not found = {}".format(request.method)
        }

    return result


# Get a user from users by ID 예제
def get_blacklist(no):

    db = Blacklist()
    result = db.get(no)

    return result


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


def deleteblacklist(no):

    db = Blacklist()
    result = db.delete_blacklist(no)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True, port=80)
