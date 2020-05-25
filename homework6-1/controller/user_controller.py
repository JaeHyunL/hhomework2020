from flask import jsonify
from flask_restplus import Namespace, Resource, fields
from table import Whitelist
from flask import request
from flask_jwt_extended import (
    jwt_required, create_access_token,
    jwt_refresh_token_required, create_refresh_token,
    get_jwt_identity, set_access_cookies, get_raw_jwt,
    set_refresh_cookies, unset_jwt_cookies
)
from user_cache import UserCache

api = Namespace('Whitelist', description='this Api for User')

resource_whitelist = api.model('whitelist', {
    'userpass': fields.String(description='Userpass'),
    'url': fields.String(description='URL  ', required=True),
    'reliability': fields.Integer(description='신뢰도 ')
})


luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int,
                      help='Number of Items in a page', location='query')


@api.route('/whitelists')
class Whitelists(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(luParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    @jwt_required
    # get 함수 선언
    def get(self):
        # list_whitelists 를 호출
        ''' 화이트리스트 정보 출력 (페이지) '''
        return list_whitelists()


@api.route('/whitelist')
class AddWhitelist(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(resource_whitelist, validate=False)
    @api.response(200, 'Success')
    # post 함수 선언
    @jwt_required
    def post(self):
        # add_whitelist 를 호출
        ''' 화이트 리스트  등록. '''
        return add_whitelist()


@api.route('/whitelist/<url>')
class WhitelistOfswaager(Resource):
     # @api.**** swagger 문서에 등록할 옵션들을 설정

    @api.marshal_with(resource_whitelist)
    @api.response(200, 'Success')
    # get 함수 선언
    @jwt_required
    def get(self, url):
        # get_whitelist를 호출
        ''' 화이트 리스트 조회. '''
#        print(get_whitelist(url))
        return get_whitelist(url)

    @api.response(200, 'Success')
    @api.expect(resource_whitelist, validate=False)
    # put 함수 선언
    @jwt_required
    def put(self, url):
        # update_whitelist 를 호출
        ''' 화이트 리스트 변경. '''
        return update_whitelist(url)

    @api.response(200, 'Success')
    # delete함수 선언
    @jwt_required
    def delete(self, url):
        '''화이트 리스트 삭제 . '''
        # delete_whitelist 선언
        return delete_whitelist(url)


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


def get_whitelist(url):

    cache = UserCache()
    result = cache.get_user(id)

    if result is not None:
        # result 가 겟유저에서 나올때 바이트 코드로 나옴 그때 변환해줘야함
        # byte to str
        result = ast.literal_eval(result.decode('utf-8', 'ignore'))
    else:

        db = Whitelist()
        result = db.getwhitelist(url)
        cache.set_user(id, str(result))
    result['token'] = get_raw_jwt()

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
