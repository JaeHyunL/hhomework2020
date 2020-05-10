import json
import logging
import requests
import time
import urllib

from flask import redirect
from flask import render_template
from flask import request
from flask import url_for
from flask import Flask, Blueprint, make_response
from table import Whitelist
from table import Blacklist

from flask_restplus import Api, Resource, fields
app = Flask(__name__)


# blueprint 선언
blueprint = Blueprint('api', __name__, url_prefix='')
# api 선언
api = Api(blueprint,
          version='1.0',
          title=' GO LEE PROJECT',
          description='리스트  등록,수정,삭제,조회 API입니다',
          doc='/api/doc/'
          )


# blueprint 등록
app.register_blueprint(blueprint)


# napmespace 생성
ns = api.namespace('',
                   description='Whitelist 사용자 등록,수정,삭제,조회'
                   )

# resource_whitelist라는 변수에 모델 선언
resource_whitelist = api.model('whitelist', {
    'userpass': fields.String(description='Userpass'),
    'url': fields.String(description='URL  ', required=True),
    'reliability': fields.Integer(description='신뢰도 ')
})


# resource_whitelists라는 변수에 모델 선언
resource_whitelists = api.model('whitelists', {
    'whitelist': fields.List(fields.Nested(resource_whitelist), description='화이트리스트'),
    'count': fields.Integer(min=0),
    'page': fields.Integer(min=0)
})


# parser  , argument 등록
luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int,
                      help='Number of Items in a page', location='query')
uaParser = api.parser()

uaParser.add_argument('userpass', type=str,
                      help='userpasswd', location='querry')


@ns.route('/setcookie')
class Setcookie(Resource):

    def get(self):
        ''' 쿠키 설정 '''
        return set_cookie()


@ns.route('/getcookie')
class Getcookie(Resource):

    def get(self):
        ''' 쿠키확인 '''
        return get_cookie()


def set_cookie():
    resp = make_response("Setting cookie!!!")
    resp.set_cookie('session_id ', 'flask cookie test')
    return resp


def get_cookie():
    session_id = request.cookies.get('session_id')
    return "session_id = {}".format(session_id)

# swagger 문서에 Whitelists등록
@ns.route('/whitelists')
class Whitelists(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(luParser)
    @api.marshal_with(resource_whitelists, as_list=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    # get 함수 선언
    def get(self):
        # list_whitelists 를 호출
        ''' 화이트리스트 정보 출력 (페이지) '''
        return list_whitelists()


@ns.route('/signin/<url>')
class SignIn(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(uaParser)
    @api.response(200, 'Success')
    # post 함수 선언
    def get(self, url):
        # add_whitelist 를 호출
        ''' 강의 영상 실습  '''
        userpass = request.args.get('userpass')
        return get_auth(url, userpass)

    # TODO 보안상 이유로 post방식 선호
    def post(self, url):
        pass
        # add_whitelist 를 호출
        ''' 강의 영상 실습  '''
        userpass = request.args.get('userpass')
        return get_auth(url, userpass)


@ns.route('/signup')
class Signup(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(resource_whitelist, validate=False)
    @api.marshal_with(resource_whitelist, as_list=False)
    @api.response(200, 'Success')
    # post 함수 선언
    def post(self):
        # add_whitelist 를 호출
        ''' 강의 영상 실습  '''
        return add_whitelist()


# swagger 문서에 Whitelist등록
@ns.route('/whitelist')
class AddWhitelist(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(resource_whitelist, validate=False)
    @api.marshal_with(resource_whitelist, as_list=False)
    @api.response(200, 'Success')
    # post 함수 선언
    def post(self):
        # add_whitelist 를 호출
        ''' 화이트 리스트  등록. '''
        return add_whitelist()

# swagger 문서에 Whitelist/<url>등록
@ns.route('/whitelist/<url>')
class WhitelistOfswaager(Resource):
     # @api.**** swagger 문서에 등록할 옵션들을 설정

    @api.marshal_with(resource_whitelist)
    @api.response(200, 'Success')
    # get 함수 선언
    def get(self, url):
        # get_whitelist를 호출
        ''' 화이트 리스트 조회. '''
#        print(get_whitelist(url))
        return get_whitelist(url)

    @api.response(200, 'Success')
    @api.expect(resource_whitelist, validate=False)
    # put 함수 선언
    def put(self, url):
        # update_whitelist 를 호출
        ''' 화이트 리스트 변경. '''
        return update_whitelist(url)

    @api.response(200, 'Success')
    # delete함수 선언
    def delete(self, url):
        '''화이트 리스트 삭제 . '''
        # delete_whitelist 선언
        return delete_whitelist(url)


#
# 블랙리스트 swagger 문서 작성
#

# 블랙리스트 를 문서화 하기 위해 새로운 네임 스페이스를 등록
ns = api.namespace('',
                   description='Blacklist 사용자 등록,수정,삭제,조회'
                   )  # /user 네임스페이스를 만든다


# resource_blacklist 에들어갈 모델을 정의
resource_blacklist = api.model('blacklist', {
    'url': fields.String(description='URL  ', required=True),
    'riskrange': fields.Integer(description='위험도')
})

# resource_blacklists 에들어갈 모델을 정의
resource_blacklists = api.model('blacklists', {
    'resource_blacklist': fields.List(fields.Nested(resource_blacklist), description='블랙리스트'),
    'count': fields.Integer(min=0),
    'page': fields.Integer(min=0)
})

# parser  , argument 등록
luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int,
                      help='Number of Items in a page')


# swagger 문서에 blacklists 등록
@ns.route('/blacklists')
class Blacklists(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(luParser)
    @api.marshal_with(resource_blacklists, as_list=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    # get 함수 선언
    def get(self):
        # list_blacklist 를 호출
        ''' 블랙리스트 정보 출력 (페이지) '''
        return list_blacklist()

# swagger 문서에 blacklist 등록
@ns.route('/blacklist')
class AddBlacklist(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(resource_blacklist, validate=False)
    @api.marshal_with(resource_blacklist, as_list=False)
    @api.response(200, 'Success')
    # post 함수 선언
    def post(self):
        # add_blackslist를 호출
        ''' 블랙 리스트  등록. '''
        return add_blackslist()

# swagger 문서에 blacklist/<url> 등록
@ns.route('/blacklist/<url>')
class BlacklistOfswagger(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.marshal_with(resource_blacklist)
    @api.response(200, 'Success')
    # get 함수 선언
    def get(self, url):
     # add_blackslist를 호출
        ''' 블랙 리스트 조회. '''
        return get_blacklist(url)

    @api.response(200, 'Success')
    @api.expect(resource_blacklist, validate=False)
    # put 함수 선언
    def put(self, url):
        # update_blacklist 호출
        ''' 블랙 리스트 변경. '''
        return update_blacklist(url)

    @api.response(200, 'Success')
    # delete 함수 선언
    def delete(self, url):
        '''블랙 리스트 삭제 . '''
        # deleteblacklist 호출
        return deleteblacklist(url)


#
# 화이트 리스트 기능 구현
#


# 화이트 리스트에 등록 시키기 위해 함수 선언
def add_whitelist():

    j = request.get_json()

    db = Whitelist()
    result = db.insert(j)
    result = {"message": "ok"} if result is None else result
    # response 에 json dump로 쿼리문을 실행시킴
    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )
    print(response)
    return response


# 화이트 리스트에 목록(페이징) 울 보기 위해 함수 선언
def list_whitelists():

    page = int(request.args.get('page', "0"))
    np = int(request.args.get('itemsInPage', "20"))

    db = Whitelist()
    res = db.lists(page=page, itemsInPage=np)
    # 아래의  json 형식으로 가져옴
    result = {
        "users": "{}".format(res),
        "count": len(res),
        "page": page
    }

    return result


# 읽기 , 수정 , 삭제 를 호출 방식에 따른 함수선언
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


def get_auth(url, passwd):
    #userpass = request.args.get('userpass')
    db = Whitelist()
    result = db.auth(url, passwd)
    print('디버깅 포인트 19 ', passwd)
    return result


# get_whitelist함수 선언  통해서 table.py에 있는 db 를 통해서 getwhitelist를 호출
def get_whitelist(url):

    db = Whitelist()
    result = db.getwhitelist(url)

    return result


# update_whitelist 선언  통해서 table.py에 있는 db 를 통해서 updatewhitelist 호출
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


# delete_whitelist 선언  통해서 table.py에 있는 db 를 통해서 deletewhitelist 호출
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


#
# Blacklist 기능 구현
#

# 블랙리스트 저장 구현
def add_blackslist():

    j = request.get_json()

    db = Blacklist()
    result = db.insert(j)
    result = {"message": "ok"} if result is None else result

    response = app.response_class(
        response=json.dumps(result),
        status=200,
        mimetype='application/json'
    )

    return response


# 블랙리스트 에 있는 목록(페이징) 구현
def list_blacklist():

    page = int(request.args.get('page', "0"))
    np = int(request.args.get('itemsInPage', "20"))

    db = Blacklist()
    res = db.lists(page=page, itemsInPage=np)

    result = {
        "users": "{}".format(res),
        "count": len(res),
        "page": page
    }

    return result


# 읽기 , 수정 , 삭제 를 호출 방식에 따른 함수선언
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


# 블랙리스트 조회
def get_blacklist(no):

    db = Blacklist()
    result = db.get(no)

    return result

# 블랙리스트 업데이트


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

# 블랙리스트 삭제


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


# 메인 선언 서버 실행
if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True, port=80)
