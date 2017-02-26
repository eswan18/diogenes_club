#from flask import Flask, render_template
import flask
import flask_mysqldb
import BakerStreetBoys as bsb

# Load our mysql credentials
mysql_cred = bsb.mysql.get_cred()

# Initialize
app = flask.Flask(__name__)
# Config Directives
app.config["MYSQL_USER"] = mysql_cred["user"]
app.config["MYSQL_PASSWORD"] = mysql_cred["password"]
app.config["MYSQL_DB"] = mysql_cred["database"]
app.config["MYSQL_HOST"] = mysql_cred["host"]

mysql = flask_mysqldb.MySQL(app)

@app.route('/')
def home():
    cur = mysql.connection.cursor()
    cur.execute('''SELECT * FROM users''')
    rv = cur.fetchall()
    print(str(rv))
    return(flask.render_template('home.html'))

@app.route('/user/')
def user():
    return('User')

@app.route('/topic/<topic_name>/')
def topic(topic_name=None):
    return(flask.render_template('topic.html', topic_name=topic_name.upper()))

@app.route('/search/<query>/')
def search(query=None):
    return(flask.render_template('search.html', query=query.lower()))
