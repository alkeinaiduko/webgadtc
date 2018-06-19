<template>
  <div id="announcements-list-container">
    <div class="announcements-list-content">
      <ul>
        <li class="announcements-list-left-panel">
          <div class="all-announcement-container">
            <div class="each-announcement-container" v-for="announcement in announcements" @click="selectOne(announcement)">
              <div class="announcement-title">
                {{announcement.title}}
              </div>
              <hr>
              <div class="announcement-description">
                <p>{{(announcement.description).substring(0, 250)}}<span v-if="announcement.description.length > 250">...</span></p>

              </div>
            </div>

          </div>
        </li>

        <li class="announcements-list-right-panel">
          <div class="announcement-detail-container">
            <div class="detail-heading">
              <h4 class="detail-title">Announcement Details</h4>
            </div>
            <div class="detail-body">
              <p><strong>ID:</strong> {{eachAnnouncement.id}}</p>
              <p><strong>Title:</strong> {{eachAnnouncement.title}}</p>
              <p><strong>Created On:</strong> {{eachAnnouncement.created_at}}</p>
              <p><strong>Updated On:</strong> {{eachAnnouncement.updated_at}}</p>
              <p><strong>Posted by:</strong> ADMIN</p>
            </div>
            <hr>
            <div class="detail-footer">
              <div class="announcement-button-container">
                <button class="btn btn-success">Edit</button>
                <button class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/javascript">
    export default {
      data() {
        return {
          announcements: [],
          eachAnnouncement: {
            id: 'No Selected ID',
            title: 'No Selected Title',
            description: 'No Selected Description',
            created_at: 'No Selected Created On',
            updated_at: 'No Selected Updated On'
          }
        }
      },
      created() {
        this.getAnnouncement();
      },
      methods: {
        getAnnouncement() {
          axios.get('/admin/get-announcements')
            .then((response) => {
            this.announcements = response.data;
          });
        },
        selectOne(announcement) {
          this.eachAnnouncement.id = announcement.id;
          this.eachAnnouncement.title = announcement.title;
          this.eachAnnouncement.created_at = announcement.created_at;
          this.eachAnnouncement.updated_at = announcement.updated_at;
          
        }
      }
    }
    
</script>
