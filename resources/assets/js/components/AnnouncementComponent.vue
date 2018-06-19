<template>

  <div id="announcements-list-container">
    <modal v-if="showModal" @close="showModal = false" :anntitle="eachAnnouncement.title" :anndesc="eachAnnouncement.description" @descChanged="edited.description = $event" @titleChanged="edited.title = $event, updateAnn(eachAnnouncement.id)">

      <!--
        you can use custom content here to overwrite
        default content
      -->
      <!-- <input slot="header" class="uk-input" :value="eachAnnouncement.title"></input> -->

      <!-- <textarea class="uk-textarea" name="description" slot="body" :value="eachAnnouncement.description"></textarea> -->
    </modal>
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
                <button class="btn btn-success" @click="showModal = true">Edit</button>
                <button class="btn btn-danger" @click="deleteSelected(eachAnnouncement.id)">Delete</button>
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
          },
          showModal: false,
          edited: {
            title: '',
            description: ''
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
          this.eachAnnouncement.description = announcement.description;
          this.eachAnnouncement.created_at = announcement.created_at;
          this.eachAnnouncement.updated_at = announcement.updated_at;
          
        },
        deleteSelected(id) {
          axios.delete('/admin/delete-announcement/'+id)
              .then((response) => {
                  alert('announcement deleted');
                  this.getAnnouncement();
              })
              .catch((e) => {
                console.log(e);
              });
        },
        updateAnn(id) {
          // console.log(newDesc, newTitle);

          if(this.edited.title == '') {
            this.edited.title = this.eachAnnouncement.title;
          }

          if(this.edited.description == '') {
            this.edited.description = this.eachAnnouncement.description;
          }

          axios.put(`/admin/edit/${id}`, this.edited)
              .then((response) => {
                console.log(response.data);
                this.getAnnouncement();
              });
        }
      }
    }
    
</script>
