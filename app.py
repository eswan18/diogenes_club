from flask import Flask, render_template
app = Flask(__name__)

@app.route('/')
def home():
    return(render_template('home.html'))

@app.route('/user/')
def user():
    return('User')

@app.route('/topic/<topic_name>/')
def topic(topic_name=None):
    return(render_template('topic.html', topic_name=topic_name.upper()))
