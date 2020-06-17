from flask import Blueprint
from flask_restplus import Api

from .auth_controller import api as ns1
from .user_controller import api as ns2
# blueprint 선언
blueprint = Blueprint('api', __name__, url_prefix='')
# api 선언
api = Api(blueprint,
          version='1.0',
          title=' GO LEE PROJECT',
          description='리스트  등록,수정,삭제,조회 API입니다',
          doc='/api/doc/'
          )

api.add_namespace(ns1, path='/api/v1')
api.add_namespace(ns2, path='/api/v1')
