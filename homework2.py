import homework1 as hw1
from flask import Flask, request
application = Flask(__name__)


@application.route("/", methods=['GET'])
def hello():
    str1 = request.args.get("str1")
    str2 = request.args.get("str2")

    return str(hw1.hw(str1, str2))


if __name__ == "__main__":
    application.run(host='0.0.0.0')
