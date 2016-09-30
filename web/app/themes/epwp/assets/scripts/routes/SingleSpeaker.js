import React from 'react';
import { render } from 'react-dom';
import Session from '../components/Session';

export default {
  init() {
    $('.open-session').click((e) => {
      e.preventDefault();
      const id = $(e.target).data('id');
      render(<Session id={id} />, document.getElementById(`single-speaker-container-${id}`));
    });
  },
};
