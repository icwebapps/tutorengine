import React, { Component } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

export default class Sidebar extends Component {
  constructor(props) {
    super();
    this.state = {
      unread: 0
    };
    this.loadData(props);
  }

  loadData() {
    axios.get('/messages/unread').then((response) => this.setState(response.data));
  }

  render() {
    return (
      <div className="nav">
        <div className={"nav-item " + (this.props.selected == "dashboard" ? "nav-selected" : "")}>
          <a href="/dashboard"><img src="/images/icons8-dashboard-50.png" /></a>
        </div>
        <div className={"nav-item " + (this.props.selected == "calendar" ? "nav-selected" : "")}>
          <a href="/calendar"><img src="/images/icons8-today-100.png" /></a>
        </div>
        <div className={"nav-item " + (this.props.selected == "contacts" ? "nav-selected" : "")}>
          <a href="/contacts"><img src="/images/icons8-address-book-2-filled-100.png" /></a>
          {
            this.state.unread > 0 ?
            <div className="sidebar-notification">{this.state.unread}</div>
            : ''
          }
        </div>
        {
          this.props.isTutor ?
          <div className={"nav-item " + (this.props.selected == "resources" ? "nav-selected" : "")}>
            <a href="/resources"><img src="/images/icons8-open-50.png" /></a>
          </div>
          : ''
        }
        <div className={"nav-item " + (this.props.selected == "account" ? "nav-selected" : "")}>
          <a href="/account"><img src="/images/icons8-male-user-50.png" /></a>
        </div>
      </div>
    );
  }
}

if (document.getElementById('sidebar-widget')) {
  var el = document.getElementById('sidebar-widget');
  ReactDOM.render(<Sidebar isTutor={el.dataset.istutor} selected={el.dataset.selected} />, el);
}
