import React from 'react';
import ContactsItem from './ContactsItem';

const ContactsList = ({contacts, q, onClick, hasChat}) => {
  return contacts.map((c, i) => {
    if (q == "" || (q != "" && c.name.toLowerCase().includes(q))) {
      return <ContactsItem contact={c} key={i} i={i} onClick={onClick} hasChat={hasChat} />
    }
  })
};

export default ContactsList;