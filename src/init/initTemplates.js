import { render } from '@wordpress/element'
import About from '../pages/About'

// Pages initialization
const rootAbout = document.getElementById('app-about')
rootAbout && render(<About />, rootAbout)
