import domReady from '@wordpress/dom-ready';
import axios from 'axios';

domReady(() => {
  const wrapper = document.querySelector('.block-projects__projects');
  const buttons = document.querySelectorAll('.block-projects__filter-button');
  if (!wrapper) {
    return;
  }
  
  init();

  /**
	 * Init function.
	 *
	 * @return void
	 */
  function init() {
    handleFilterButtons();
    handlePaginationLinks();
    handlePopstateEvent();
  }

  /**
	 * Handle filter buttons.
	 *
	 * @return void
	 */
  function handleFilterButtons() {
    // const buttons = document.querySelectorAll('.block-projects__filter-button');
    // const url = new URL(window.location);

    if (buttons) {
      buttons.forEach((button) => {
        button.addEventListener('click', async function(event) {
          if (button.classList.contains('active')) {
            return;
          }

          const slug   = event.target.dataset.slug;
          const termId = event.target.dataset.id;
          const url = new URL(window.location);

          setNewUrl(url, slug);

          changeActiveButton(buttons, slug);

          const { data, wpTotalPages } = await getProjects(termId);
          
          if (data.length) {
            const html = getHtml(data);
            wrapper.innerHTML = html;

            const filter = slug === 'all' ? '' : slug;

            updatePagination(wpTotalPages, 1, filter);
          }
        });
        
      });
    }
  }

  /**
	 * Handle pagination links.
	 *
	 * @return void
	 */
  function handlePaginationLinks() {
    const paginationLinks = document.querySelectorAll('.block-projects__pagination a');

    if (paginationLinks) {
      paginationLinks.forEach((link) => {
        link.addEventListener('click', async function(event) {
          const url = new URL(window.location);
          event.preventDefault();
          const href = event.target.getAttribute('href');
          let response = null;
          let filter = '';
          let page = 1;
          if (href.includes('page')) {
            page = parseInt(href.slice(href.indexOf('page') + 5, href.lastIndexOf('/')), 10);

            if (href.includes('filter')) {
              filter = getFilterFromUrl(href);
              const button = document.querySelector(`[data-slug="${filter}"]`);
              const termId = parseInt(button.getAttribute('data-id'), 10);
              console.log("termId", termId);
              response = await getProjects(termId, page);
            } else {
              response = await getProjects('0', page);
            }

          } else {
            if (href.includes('filter')) {
              filter = getFilterFromUrl(href);
              const button = document.querySelector(`[data-slug="${filter}"]`);
              const termId = parseInt(button.getAttribute('data-id'), 10);
              response = await getProjects(termId);
            } else {
              response = await getProjects();
            }
          }

          filter = filter === '' ? 'all' : filter;

          setNewUrl(url, filter, page);
          if (response) {
            const { data, wpTotalPages } = response;

            if (data.length) {
              const html = getHtml(data);
              wrapper.innerHTML = html;

              updatePagination(wpTotalPages, page, filter);
            }
          }
          
        });
      });
    }
  }

  /**
	 * Handle popstate event, while navigating back/forward in browser.
	 *
	 * @return void
	 */
  function handlePopstateEvent() {

    window.addEventListener('popstate', async () => {
      const url = new URL(window.location);
      let page = 1;
      let response = null;
      let filter = '';

      if (url.href.includes('page')) {
        page = parseInt(url.href.slice(url.href.indexOf('page') + 5, url.href.lastIndexOf('/')), 10);
      }

      if (url.href.includes('filter')) {
        filter = getFilterFromUrl(url.href);
        const button = document.querySelector(`[data-slug="${filter}"]`);
        const termId = parseInt(button.getAttribute('data-id'), 10);
        response = await getProjects(termId, page);
      } else {
        response = await getProjects('0', page);
      }

      filter = filter === '' ? 'all' : filter;

      if (response) {
        const { data, wpTotalPages } = response;

        if (data.length) {
          const html = getHtml(data);
          wrapper.innerHTML = html;

          updatePagination(wpTotalPages, page, filter);
          changeActiveButton(buttons, filter);
        }
      }

    });
  }

  /**
	 * Get projects.
	 *
	 * @param string  termId    Id of project CPT taxonomy.
	 * @param int     page      Page parameter for pagination.
	 * @return object
	 */
  async function getProjects(termId = '0', page = 1) {
    let url = `${siteData.siteUrl}/wp-json/wp/v2/project?per_page=4&page=${page}`;

    if (termId !== '0') {
      url += `&project_cat=${termId}`;
    }

    try {
      const response = await axios(url);
      if (response.status !== 200) {
        throw new Error(`Response status: ${response.status}`);
      }

      const { data } = response;
      const wpTotalPages = parseInt(response.headers['x-wp-totalpages'], 10);
      const wpTotal = parseInt(response.headers['x-wp-total'], 10);

      return {
        data,
        wpTotalPages,
        wpTotal
      };
    } catch (error) {
      console.error(error.message);
      return {
        data: [],
        wpTotalPages: 0,
        wpTotal: 0
      }
    }
  }

  /**
	 * Get HTML.
	 *
	 * @param array     data   Array with projects data.
	 * @return string          String with HTML.
	 */
  function getHtml(data) {
    let html = '';
    data.forEach((el) => {
      html += `
        <div class="block-projects__item">
          ${el.image}
          <div class="block-projects__item-text">
            <a class="block-projects__item-title" href="${el.link}">${el.title.rendered}</a>
            <div class="block-projects__item-excerpt">${el.excerpt_short}</div>
          </div>
        </div>
      `;
    });

    return html;
  }

  /**
	 * Set new URL, in browser.
	 *
	 * @param object  url   instance of URL class.
	 * @param string  slug  Filter slug.
	 * @param int     page  Page parameter for pagination.
	 * @return void
	 */
  function setNewUrl(url, slug, page = 1) {
    let newUrl = '';

    if (url.href.includes('page')) {
      newUrl = url.href.slice(0, url.href.indexOf('page'));
    } 

    const maybePage = page === 1 ? '' : `page/${page}/`;
    
    if ('all' === slug) {
      if (url.href.includes('filter')) {
        newUrl = url.href.substring(0, url.href.indexOf('filter')) + maybePage;
        window.history.pushState(null, '', newUrl);
      } else {
        window.history.pushState(null, '', newUrl + maybePage);
      }  
    } else {
      newUrl = url.href.slice(0, url.href.indexOf('filter'));

      if (!url.href.includes('filter') && url.href.includes('page')) {
        newUrl = url.href.slice(0, url.href.indexOf('page'));
        newUrl = `${newUrl}filter/${slug}/${maybePage}`;

      } else if (url.href.includes('filter')) {
        newUrl = `${newUrl}filter/${slug}/${maybePage}`;
      } else {
        newUrl = `${newUrl}/filter/${slug}/${maybePage}`;
      }
      
      window.history.pushState(null, '', newUrl);
    }
  }

  /**
	 * Change active filter button.
	 *
	 * @param array  buttons  Array of selected HTML.
	 * @param string filter   Filter slug.
	 * @return void
	 */
  function changeActiveButton(buttons, filter) {
    buttons.forEach((b) => {
      if (b.getAttribute('data-slug') === filter) {
        b.classList.add('active');
        b.setAttribute('aria-pressed', true);
      } else {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', false);
      }
    });
  }

  /**
	 * Update pagination.
	 *
	 * @param int     wpTotalPages  Number of total pages in WP Query.
	 * @param int     page          Page parameter for pagination.
	 * @param string  filter        Filter slug.
	 * @return void
	 */
  function updatePagination(wpTotalPages, page = 1, filter = '') {

    const paginationWrapper = document.querySelector('.block-projects__pagination');
    const pageSlug = paginationWrapper.getAttribute('data-page-slug');
    let url = `${siteData.siteUrl}/${pageSlug}`;
    if ('' !== filter && 'all' !== filter) {
      url = `${siteData.siteUrl}/${pageSlug}/filter/${filter}`;
    }

    let html = '';
    if (wpTotalPages > 1) {
      html = `
        <div class="pagination">
		      <ul class="pagination__list">
      `;

      if ( ( page - 1 ) > 1 ) {
        const newer = page - 1;
        html += `
          <li class="pagination__newer-arrow">
            <a href="${url}/page/${newer}/">${'←'}</a>
          </li>
        `;
      } else if ( ( page - 1 ) === 1 ) {
        html += `
          <li class="pagination__newer-arrow">
            <a href="${url}">${'←'}</a>
          </li>
        `;
      }

      if ( ( page - 2 ) > 1 ) {
        const newer = page - 2;
        html += `
          <li class="pagination__newer-2">
            <a href="${url}/page/${newer}/">${newer}</a>
          </li>
        `;
      } else if ( ( page - 2 ) === 1 ) {
        const newer = page - 2;
        html += `
          <li class="pagination__newer-2">
            <a href="${url}">${newer}</a>
          </li>
        `;
      }

      if ( ( page - 1 ) > 1 ) {
        const newer = page - 1;
        html += `
          <li class="pagination__newer">
            <a href="${url}/page/${newer}/">${newer}</a>
          </li>
        `;
      } else if ( ( page - 1 ) === 1 ) {
        const newer = page - 1;
        html += `
          <li class="pagination__newer">
            <a href="${url}">${newer}</a>
          </li>
        `;
      }

      html += `
        <li class="pagination__current">
          ${page}
        </li>
      `;

      if ( ( page + 1 ) < wpTotalPages) {
        const older = page + 1;
        html += `
          <li class="pagination__older">
            <a href="${url}/page/${older}/">${older}</a>
          </li>
        `;
      }

      if ( ( page + 2 ) <= wpTotalPages) {
        const older = page + 2;
        html += `
          <li class="pagination__older-2">
            <a href="${url}/page/${older}/">${older}</a>
          </li>
        `;
      }

      if ( ( page + 1 ) <= wpTotalPages) {
        const older = page + 1;
        html += `
          <li class="pagination__older-arrow">
            <a href="${url}/page/${older}/">${'→'}</a>
          </li>
        `;
      }

      html += `
          </ul>
		    </div>
      `;
    }

    paginationWrapper.innerHTML = html;
    handlePaginationLinks();
  }

  /**
	 * Get filter slug from URL.
	 *
	 * @param string   str  URL.
	 * @return string       Filter slug.
	 */
  function getFilterFromUrl(str) {

    // Match "/filter/..." optionally followed by "/page/{number}"
    const match = str.match(/\/filter\/(.+?)(?:\/page\/\d+)?\/?$/);

    if (match && match[1]) {
      const filterPath = match[1];
      return filterPath;
    }

    return '';
  }

});

