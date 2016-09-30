import React, { PropTypes, Component } from 'react';
import request from 'superagent';

class Session extends Component {
  constructor(props) {
    super(props);
    this.state = { content: 'Loading...' };
  }

  componentDidMount() {
    const url = `/wp-json/wp/v2/session/${this.props.id}`;
    request.get(url)
      .end((err, res) => {
        const data = JSON.parse(res.text);
        this.setState({ content: data.content.rendered });
      });
  }

  render() {
    return (
      <div dangerouslySetInnerHTML={{ __html: this.state.content }} />
    );
  }
}

Session.propTypes = {
  id: PropTypes.number.isRequired,
};

export default Session;
