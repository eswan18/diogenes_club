from flask import Flask, render_template, request, session, redirect, url_for
import flask_mysqldb, werkzeug.security
import BakerStreetBoys as bsb

# Load our credentials
mysql_cred = bsb.mysql.get_cred()
secret_key = bsb.general.get_secret_key()["secret_key"]

# Initialize
app = Flask(__name__)
# Config Directives
app.config["MYSQL_USER"] = mysql_cred["user"]
app.config["MYSQL_PASSWORD"] = mysql_cred["password"]
app.config["MYSQL_DB"] = mysql_cred["database"]
app.config["MYSQL_HOST"] = mysql_cred["host"]
app.secret_key = secret_key

mysql = flask_mysqldb.MySQL(app)

@app.route('/')
def home():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM topics')
    raw_topics = cur.fetchall()
    topics = [x[1] for x in raw_topics]
    return(render_template('home.html',
                                 topics = topics))

@app.route('/user/')
def user():
    return('User')

@app.route('/topic/<topic_name>/')
def topic(topic_name=None):
    return(render_template('topic.html', topic_name=topic_name.upper()))

@app.route('/search/<query>/')
def search(query=None):
    return(render_template('search.html', query=query.lower()))

@app.route('/login/', methods=['GET','POST'])
def login():
    # Post requests indicate a login attempt
    if (request.method == 'POST'):
        # If username and password aren't both set, then it's a bad request
        if ('username' not in request.form or 'password' not in request.form):
            return('Bad request - you must send a uname and pw')
        username = request.form['username']
        password = request.form['password']
        hashed_password = werkzeug.security.generate_password_hash(password)
        print(username, password, hashed_password)
        # Verify them against the database
        
        # Then set the session username
        session['username'] = request.form['username']
        #session['user_id'] = user_id
    # If the user is already logged in
    return(render_template('login_unauth.html'))
    if ('username' in session):
        return("You're logged in as " + session['username'])
    else:
        return(render_template('login_unauth.html'))
        

@app.route('/logout/')
def logout():
    session.pop('username', None)
    return(redirect(url_for('home')))
    
