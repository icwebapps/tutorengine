import React, { Component } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import EmailField from '../Form/EmailField';
import PasswordField from '../Form/PasswordField';

export default class Login extends Component {
  constructor() {
    super();
    this.state = {
      email: '',
      password: '',
      error: ''
    };
  }
  
  onChange(el, val) {
    const tempState = { error: '' };
    tempState[el] = val;
    this.setState(tempState);
  }

  onSubmit(e) {
    e.preventDefault();
    axios.post('/login', this.state).then((response) => {
      if (response.data.login == 1) {
        location.href = '/dashboard';
      }
      else {
        this.displayError("Login details were incorrect");
      }
    });
  }

  displayError(msg) {
    this.setState({ error: msg });
  }

  render() {
    return (
      <form method="post" onSubmit={(e)=>this.onSubmit(e)}>
        <EmailField required="true" value={this.state.email} onChange={(val) => this.onChange('email', val)} onError={(msg) => this.displayError(msg)}/> 
        <PasswordField required="true" value={this.state.password} onChange={(val) => this.onChange('password', val)} onError={(msg) => this.displayError(msg)} />
        <input type="submit" value="Log in" />
        { this.state.error != '' ? <div className="form-errors">{this.state.error}</div> : '' }
      </form>
    );
  }
}

if (document.getElementById('login-form')) {
  ReactDOM.render(<Login />, document.getElementById('login-form'));
}
