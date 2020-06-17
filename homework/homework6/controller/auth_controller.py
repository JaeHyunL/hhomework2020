from flask import jsonify, request
from flask_restplus import Namespace, Resource, fields
from table import Whitelist
from .user_controller import resource_whitelist
from .user_controller import add_whitelist
from flask_jwt_extended import (
    jwt_required, create_access_token,
    jwt_refresh_token_required, create_refresh_token,
    get_jwt_identity, set_access_cookies,
    set_refresh_cookies, unset_jwt_cookies
)

from flask import request


api = Namespace('Auth', description='this Api for Auth')


resource_auth = api.model('Auth', {
    'no': fields.Integer(description='The user email', required=False),
    'url': fields.String(description='The user email', required=False),
    'userpass': fields.String(description='The user password', required=True)
})


uaParser = api.parser()
uaParser.add_argument('userpass', type=str,
                      help='userpasswd', location='querry')


@api.route('/siginin/<url>')
class SignIn(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    @api.expect(uaParser)
    @api.response(200, 'Success')
    # post 함수 선언
    def get(self, url):
        # add_whitelist 를 호출
        ''' 사인인 강의 영상 실습  '''
        userpass = request.args.get('userpass')
        return get_auth(url, userpass)

    # TODO 보안상 이유로 post방식 선호
    def post(self, url):
        ''' 사인인 강의 영상 실습  '''
        j = request.get_json()
        return get_auth(url, j.get('userpass'))


@api.route('/signup')
class Signup(Resource):
    # swagger 문서에 등록할 옵션들을 설정
    # @api.expect(resource_whitelist, validate=False)
    # @api.marshal_with(resource_whitelist, as_list=False)
    @api.response(200, 'Success')
    # post 함수 선언
    def post(self):
        # add_whitelist 를 호출
        ''' 강의 영상 실습  '''
        return add_whitelist()


def get_auth(url, passwd):

    db = Whitelist()
    result = db.auth(url, passwd)
    print('디버깅포인트 23 ', result)
    # Create  the token we will be sending back to user
    access_token = create_access_token(identity=url)
    print('디버깅포인트 24 access_token ', access_token)
    # Set the jwt    cookies in the response
    refresh_token = create_refresh_token(identity=url)
    print('디버깅포인트 25 refresh_token ', refresh_token)
    resp = jsonify({'login': result})
    set_access_cookies(resp, access_token)
    set_refresh_cookies(resp, refresh_token)

    return resp
